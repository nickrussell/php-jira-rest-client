<?php

namespace JiraRestApi\IssueLink;

use JiraRestApi\JiraException;

class IssueLinkService extends \JiraRestApi\JiraClient
{
    private $uri = '';

    public function addIssueLink($issueLink)
    {
        $this->log->addInfo("addIssueLink=\n");

        $data = json_encode($issueLink);

        $this->log->addDebug("Create IssueLink=\n".$data);

        $url = $this->uri . "/issueLink";
        $type = 'POST';

        $ret = $this->exec($url, $data, $type);
    }

    public function getIssueLinkTypes()
    {
        $this->log->addInfo("getIssueLinkTYpes=\n");

        $url = $this->uri . "/issueLinkType";

        $ret = $this->exec($url);

        $data = json_encode(json_decode($ret)->issueLinkTypes);

        $linkTypes = $this->json_mapper->mapArray(
            json_decode($data, false), new \ArrayObject(), '\JiraRestApi\IssueLink\IssueLinkType'
        );

        return $linkTypes;
    }
}
