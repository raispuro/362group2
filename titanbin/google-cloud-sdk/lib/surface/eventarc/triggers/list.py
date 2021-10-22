# -*- coding: utf-8 -*- #
# Copyright 2020 Google LLC. All Rights Reserved.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#    http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
"""Command to list all triggers in a project and location."""

from __future__ import absolute_import
from __future__ import division
from __future__ import unicode_literals

import re

from googlecloudsdk.api_lib.eventarc import triggers
from googlecloudsdk.calliope import base
from googlecloudsdk.command_lib.eventarc import flags
from googlecloudsdk.command_lib.eventarc import types

_DETAILED_HELP = {
    'DESCRIPTION':
        '{description}',
    'EXAMPLES':
        """ \
        To list all triggers in location ``us-central1'', run:

          $ {command} --location=us-central1
        """,
}

_FORMAT = """ \
table(
    name.scope("triggers"):label=NAME,
    eventFilters.type():label=TYPE,
    destination():label=DESTINATION,
    active_status():label=ACTIVE
)
"""

_FORMAT_BETA = """ \
table(
    name.scope("triggers"):label=NAME,
    matchingCriteria.type():label=TYPE,
    destination.cloudRunService.service:label=DESTINATION_RUN_SERVICE,
    destination.cloudRunService.path:label=DESTINATION_RUN_PATH,
    active_status():label=ACTIVE
)
"""


def _ActiveStatus(trigger):
  event_filters = trigger.get('eventFilters', trigger.get('matchingCriteria'))
  event_type = types.EventFiltersDictToType(event_filters)
  active_time = triggers.TriggerActiveTime(event_type, trigger['updateTime'])
  return 'By {}'.format(active_time) if active_time else 'Yes'


def _Destination(trigger):
  """Generate a destination string for the trigger.

  Based on different destination types, this function returns a destination
  string accordingly:

    * Cloud Run trigger: "Cloud Run: {cloud run service}"
    * GKE trigger: "GKE: {gke service}"
    * Workflows trigger: "Workflows: {workflow name}"
    * Cloud Functions trigger: "Cloud Functions: {cloud function name}"

  For unknown destination (e.g. new types of destination and corrupted
  destination), this function returns an empty string.

  Args:
    trigger: eventarc trigger proto in python map format.

  Returns:
    A string representing the destination for the trigger.
  """
  destination = trigger.get('destination')

  if 'cloudRun' in destination:
    dest = destination.get('cloudRun')
    return 'Cloud Run: {}'.format(dest.get('service'))
  elif 'gke' in destination:
    dest = destination.get('gke')
    return 'GKE: {}'.format(dest.get('service'))
  elif 'cloudFunction' in destination:
    cloud_function_str_pattern = '^projects/.*/locations/.*/functions/(.*)$'
    dest = destination.get('cloudFunction')
    match = re.search(cloud_function_str_pattern, dest)
    return 'Cloud Functions: {}'.format(match.group(1)) if match else ''
  elif 'workflow' in destination:
    workflows_str_pattern = '^projects/.*/locations/.*/workflows/(.*)$'
    dest = destination.get('workflow')
    match = re.search(workflows_str_pattern, dest)
    return 'Workflows: {}'.format(match.group(1)) if match else  ''
  else:
    # For new types of triggers, return empty string for now.
    return ''


@base.ReleaseTracks(base.ReleaseTrack.GA)
class List(base.ListCommand):
  """List Eventarc triggers."""

  detailed_help = _DETAILED_HELP

  @staticmethod
  def Args(parser):
    flags.AddLocationResourceArg(
        parser,
        "The location for which to list triggers. This should be either "
        "``global'' or one of the supported regions.",
        required=True)
    parser.display_info.AddFormat(_FORMAT)
    parser.display_info.AddUriFunc(triggers.GetTriggerURI)
    parser.display_info.AddTransforms({
        'active_status': _ActiveStatus,
        'destination': _Destination,
        'type': types.EventFiltersDictToType,
    })

  def Run(self, args):
    """Run the list command."""
    client = triggers.CreateTriggersClient(self.ReleaseTrack())
    location_ref = args.CONCEPTS.location.Parse()
    return client.List(location_ref, args.limit, args.page_size)


@base.ReleaseTracks(base.ReleaseTrack.BETA)
class ListBeta(List):
  """List Eventarc triggers."""

  @staticmethod
  def Args(parser):
    List.Args(parser)
    parser.display_info.AddFormat(_FORMAT_BETA)