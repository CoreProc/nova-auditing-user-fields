<?php

namespace Coreproc\NovaAuditingUserFields;

use Laravel\Nova\Fields\Field;
use Illuminate\Support\Str;

abstract class BaseAuditingUserField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-auditing-user-field';

    private $auditingUserResource;

    private $auditingUserResourceId;

    public $showOnCreation = false;

    public $showOnUpdate = false;

    abstract protected function getAudit($resource);

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed $resource
     * @param  string $attribute
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $audit = $this->getAudit($resource);

        if (empty($audit) || empty($audit->user_type) || empty($audit->user_id)) {
            return null;
        }

        $this->guessUserResource($audit);

        return $audit->user->name;
    }

    private function guessUserResource($audit)
    {
        $split = explode('\\', $audit->user_type);

        $this->auditingUserResource = Str::snake(Str::plural(last($split)), '-');
        $this->auditingUserResourceId = $audit->user_id;
    }

    /**
     * Get additional meta information to merge with the field payload.
     *
     * @return array
     */
    public function meta()
    {
        return array_merge([
            'auditingUserResource' => $this->auditingUserResource,
            'auditingUserResourceId' => $this->auditingUserResourceId,
        ], $this->meta);
    }
}
