<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/orchestration/airflow/service/v1/environments.proto

namespace Google\Cloud\Orchestration\Airflow\Service\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The configuration information for configuring a Private IP Cloud Composer
 * environment.
 *
 * Generated from protobuf message <code>google.cloud.orchestration.airflow.service.v1.PrivateEnvironmentConfig</code>
 */
class PrivateEnvironmentConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. If `true`, a Private IP Cloud Composer environment is created.
     * If this field is set to true, `IPAllocationPolicy.use_ip_aliases` must be
     * set to true.
     *
     * Generated from protobuf field <code>bool enable_private_environment = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $enable_private_environment = false;
    /**
     * Optional. Configuration for the private GKE cluster for a Private IP
     * Cloud Composer environment.
     *
     * Generated from protobuf field <code>.google.cloud.orchestration.airflow.service.v1.PrivateClusterConfig private_cluster_config = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $private_cluster_config = null;
    /**
     * Optional. The CIDR block from which IP range for web server will be reserved. Needs
     * to be disjoint from `private_cluster_config.master_ipv4_cidr_block` and
     * `cloud_sql_ipv4_cidr_block`.
     *
     * Generated from protobuf field <code>string web_server_ipv4_cidr_block = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $web_server_ipv4_cidr_block = '';
    /**
     * Optional. The CIDR block from which IP range in tenant project will be reserved for
     * Cloud SQL. Needs to be disjoint from `web_server_ipv4_cidr_block`.
     *
     * Generated from protobuf field <code>string cloud_sql_ipv4_cidr_block = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $cloud_sql_ipv4_cidr_block = '';
    /**
     * Output only. The IP range reserved for the tenant project's App Engine VMs.
     *
     * Generated from protobuf field <code>string web_server_ipv4_reserved_range = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $web_server_ipv4_reserved_range = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $enable_private_environment
     *           Optional. If `true`, a Private IP Cloud Composer environment is created.
     *           If this field is set to true, `IPAllocationPolicy.use_ip_aliases` must be
     *           set to true.
     *     @type \Google\Cloud\Orchestration\Airflow\Service\V1\PrivateClusterConfig $private_cluster_config
     *           Optional. Configuration for the private GKE cluster for a Private IP
     *           Cloud Composer environment.
     *     @type string $web_server_ipv4_cidr_block
     *           Optional. The CIDR block from which IP range for web server will be reserved. Needs
     *           to be disjoint from `private_cluster_config.master_ipv4_cidr_block` and
     *           `cloud_sql_ipv4_cidr_block`.
     *     @type string $cloud_sql_ipv4_cidr_block
     *           Optional. The CIDR block from which IP range in tenant project will be reserved for
     *           Cloud SQL. Needs to be disjoint from `web_server_ipv4_cidr_block`.
     *     @type string $web_server_ipv4_reserved_range
     *           Output only. The IP range reserved for the tenant project's App Engine VMs.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Orchestration\Airflow\Service\V1\Environments::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. If `true`, a Private IP Cloud Composer environment is created.
     * If this field is set to true, `IPAllocationPolicy.use_ip_aliases` must be
     * set to true.
     *
     * Generated from protobuf field <code>bool enable_private_environment = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getEnablePrivateEnvironment()
    {
        return $this->enable_private_environment;
    }

    /**
     * Optional. If `true`, a Private IP Cloud Composer environment is created.
     * If this field is set to true, `IPAllocationPolicy.use_ip_aliases` must be
     * set to true.
     *
     * Generated from protobuf field <code>bool enable_private_environment = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setEnablePrivateEnvironment($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_private_environment = $var;

        return $this;
    }

    /**
     * Optional. Configuration for the private GKE cluster for a Private IP
     * Cloud Composer environment.
     *
     * Generated from protobuf field <code>.google.cloud.orchestration.airflow.service.v1.PrivateClusterConfig private_cluster_config = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\Orchestration\Airflow\Service\V1\PrivateClusterConfig|null
     */
    public function getPrivateClusterConfig()
    {
        return isset($this->private_cluster_config) ? $this->private_cluster_config : null;
    }

    public function hasPrivateClusterConfig()
    {
        return isset($this->private_cluster_config);
    }

    public function clearPrivateClusterConfig()
    {
        unset($this->private_cluster_config);
    }

    /**
     * Optional. Configuration for the private GKE cluster for a Private IP
     * Cloud Composer environment.
     *
     * Generated from protobuf field <code>.google.cloud.orchestration.airflow.service.v1.PrivateClusterConfig private_cluster_config = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\Orchestration\Airflow\Service\V1\PrivateClusterConfig $var
     * @return $this
     */
    public function setPrivateClusterConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Orchestration\Airflow\Service\V1\PrivateClusterConfig::class);
        $this->private_cluster_config = $var;

        return $this;
    }

    /**
     * Optional. The CIDR block from which IP range for web server will be reserved. Needs
     * to be disjoint from `private_cluster_config.master_ipv4_cidr_block` and
     * `cloud_sql_ipv4_cidr_block`.
     *
     * Generated from protobuf field <code>string web_server_ipv4_cidr_block = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getWebServerIpv4CidrBlock()
    {
        return $this->web_server_ipv4_cidr_block;
    }

    /**
     * Optional. The CIDR block from which IP range for web server will be reserved. Needs
     * to be disjoint from `private_cluster_config.master_ipv4_cidr_block` and
     * `cloud_sql_ipv4_cidr_block`.
     *
     * Generated from protobuf field <code>string web_server_ipv4_cidr_block = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setWebServerIpv4CidrBlock($var)
    {
        GPBUtil::checkString($var, True);
        $this->web_server_ipv4_cidr_block = $var;

        return $this;
    }

    /**
     * Optional. The CIDR block from which IP range in tenant project will be reserved for
     * Cloud SQL. Needs to be disjoint from `web_server_ipv4_cidr_block`.
     *
     * Generated from protobuf field <code>string cloud_sql_ipv4_cidr_block = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getCloudSqlIpv4CidrBlock()
    {
        return $this->cloud_sql_ipv4_cidr_block;
    }

    /**
     * Optional. The CIDR block from which IP range in tenant project will be reserved for
     * Cloud SQL. Needs to be disjoint from `web_server_ipv4_cidr_block`.
     *
     * Generated from protobuf field <code>string cloud_sql_ipv4_cidr_block = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setCloudSqlIpv4CidrBlock($var)
    {
        GPBUtil::checkString($var, True);
        $this->cloud_sql_ipv4_cidr_block = $var;

        return $this;
    }

    /**
     * Output only. The IP range reserved for the tenant project's App Engine VMs.
     *
     * Generated from protobuf field <code>string web_server_ipv4_reserved_range = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getWebServerIpv4ReservedRange()
    {
        return $this->web_server_ipv4_reserved_range;
    }

    /**
     * Output only. The IP range reserved for the tenant project's App Engine VMs.
     *
     * Generated from protobuf field <code>string web_server_ipv4_reserved_range = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setWebServerIpv4ReservedRange($var)
    {
        GPBUtil::checkString($var, True);
        $this->web_server_ipv4_reserved_range = $var;

        return $this;
    }

}
