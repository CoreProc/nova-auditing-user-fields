<?php

namespace Coreproc\NovaAuditingUserFields;

class CreatedBy extends BaseAuditingUserField
{
    protected function getAudit($resource)
    {
        return $resource->audits()->where('event', 'created')->first();
    }
}
