<?php

declare(strict_types=1);

namespace MiladTech\Support\Traits;

use MiladTech\Validating\Injectors\UniqueWithInjector;
use MiladTech\Validating\ValidatingTrait as BaseValidatingTrait;

trait ValidatingTrait
{
    use UniqueWithInjector;
    use BaseValidatingTrait;

    /**
     * Merge new validation rules with existing validation rules on the model.
     *
     * @param array $rules
     *
     * @return $this
     */
    public function mergeRules(array $rules)
    {
        $this->rules += $rules;

        return $this;
    }

    /**
     * Register a validating event with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    public static function validating($callback)
    {
        static::registerModelEvent('validating', $callback);
    }

    /**
     * Register a validated event with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    public static function validated($callback)
    {
        static::registerModelEvent('validated', $callback);
    }
}
