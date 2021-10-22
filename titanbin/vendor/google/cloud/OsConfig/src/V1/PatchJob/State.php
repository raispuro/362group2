<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/patch_jobs.proto

namespace Google\Cloud\OsConfig\V1\PatchJob;

use UnexpectedValueException;

/**
 * Enumeration of the various states a patch job passes through as it
 * executes.
 *
 * Protobuf type <code>google.cloud.osconfig.v1.PatchJob.State</code>
 */
class State
{
    /**
     * State must be specified.
     *
     * Generated from protobuf enum <code>STATE_UNSPECIFIED = 0;</code>
     */
    const STATE_UNSPECIFIED = 0;
    /**
     * The patch job was successfully initiated.
     *
     * Generated from protobuf enum <code>STARTED = 1;</code>
     */
    const STARTED = 1;
    /**
     * The patch job is looking up instances to run the patch on.
     *
     * Generated from protobuf enum <code>INSTANCE_LOOKUP = 2;</code>
     */
    const INSTANCE_LOOKUP = 2;
    /**
     * Instances are being patched.
     *
     * Generated from protobuf enum <code>PATCHING = 3;</code>
     */
    const PATCHING = 3;
    /**
     * Patch job completed successfully.
     *
     * Generated from protobuf enum <code>SUCCEEDED = 4;</code>
     */
    const SUCCEEDED = 4;
    /**
     * Patch job completed but there were errors.
     *
     * Generated from protobuf enum <code>COMPLETED_WITH_ERRORS = 5;</code>
     */
    const COMPLETED_WITH_ERRORS = 5;
    /**
     * The patch job was canceled.
     *
     * Generated from protobuf enum <code>CANCELED = 6;</code>
     */
    const CANCELED = 6;
    /**
     * The patch job timed out.
     *
     * Generated from protobuf enum <code>TIMED_OUT = 7;</code>
     */
    const TIMED_OUT = 7;

    private static $valueToName = [
        self::STATE_UNSPECIFIED => 'STATE_UNSPECIFIED',
        self::STARTED => 'STARTED',
        self::INSTANCE_LOOKUP => 'INSTANCE_LOOKUP',
        self::PATCHING => 'PATCHING',
        self::SUCCEEDED => 'SUCCEEDED',
        self::COMPLETED_WITH_ERRORS => 'COMPLETED_WITH_ERRORS',
        self::CANCELED => 'CANCELED',
        self::TIMED_OUT => 'TIMED_OUT',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(State::class, \Google\Cloud\OsConfig\V1\PatchJob_State::class);
