<?php

namespace Coreproc\NovaAuditingUserFields;

use Laravel\Nova\Fields\Field;

class UpdatedBy extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-auditing-created-by-field';

    private $updaterResource;

    private $updaterResourceId;

    public $showOnCreation = false;

    public $showOnUpdate = false;

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
    }

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed $resource
     * @param  string $attribute
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $audit = $resource->audits()->where('event', 'updated')->first();

        if (empty($audit) || empty($audit->user_type) || empty($audit->user_id)) {
            return null;
        }

        $this->guessUserResource($audit);

        return $audit->user->name;
    }

    private function guessUserResource($audit)
    {
        $split = explode('\\', $audit->user_type);

        $this->updaterResource = snake_case(str_plural(last($split)), '-');
        $this->updaterResourceId = $audit->user_id;
    }

    /**
     * Get additional meta information to merge with the field payload.
     *
     * @return array
     */
    public function meta()
    {
        return array_merge([
            'updaterResource' => $this->updaterResource,
            'updaterResourceId' => $this->updaterResourceId,
        ], $this->meta);
    }
}
