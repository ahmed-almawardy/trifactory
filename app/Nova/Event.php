<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Boolean;

use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Resource
{
    public static $category = "Events Manage";

    use SoftDeletes;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Event';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            // ID::make()->sortable(),
            Text::make('Name', 'name')->sortable(),
            Text::make('Country', 'country')->sortable(),
            Place::make('City', 'city')->onlyCities()->countries(['EG']),
            Place::make('Address', 'address')->countries(['EG']),
            Date::make('From', 'event_start')->sortable(),
            Date::make('To', 'event_end')->sortable(),
            Boolean::make('Published', 'published')
            ->trueValue('yes')
            ->falseValue('no'),

            Trix::make('Details', 'details')->sortable(),
            // HasMany::make('Eventsimage'),
            // HasMany::make('Race'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
