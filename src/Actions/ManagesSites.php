<?php

namespace OhDear\PhpSdk\Actions;

use OhDear\PhpSdk\Resources\Site;

trait ManagesSites
{
    public function sites(): array
    {
        return $this->transformCollection(
            $this->get('sites')['data'],
            Site::class
        );
    }

    public function site(int $siteId): Site
    {
        $siteAttributes = $this->get("sites/{$siteId}");

        return new Site($siteAttributes);
    }

    public function createSite(array $data): Site
    {
        $siteAttributes = $this->post("sites", $data);

        return new Site($siteAttributes);
    }

    public function deleteSite(int $siteId)
    {
        $this->delete("sites/$siteId");
    }
}