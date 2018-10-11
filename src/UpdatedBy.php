<?php

namespace Coreproc\NovaAuditingUserFields;

class UpdatedBy extends BaseAuditingUserField
{
    protected function getAudit($resource)
    {
        return $resource->audits()->where('event', 'updated')->latest()->first();
    }
}
