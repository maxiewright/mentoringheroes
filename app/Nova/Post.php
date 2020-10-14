<?php

namespace App\Nova;



use Armincms\Fields\BelongsToMany;
use Armincms\Fields\MorphToMany;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('SEO Title', 'seo_title'),

            Image::make('Feature Image', 'image_path')
            ->disk('public')
            ->path('post-images')
                ->storeAs(function (Request $request) {
                    return sha1($request->file('image_path')->getClientOriginalName());
                })
                ->rules('required'),

            Text::make('Excerpt')
                ->rules('required'),

            Trix::make('Body')
                ->hideFromIndex()
                ->rules('required'),

            Slug::make('Slug', 'slug')
                ->rules('required'),

            Text::make('Meta Description', 'meta_description')
                ->rules('required'),

            Text::make('Meta Keywords', 'meta_keywords')
                ->rules('required'),

            BelongsTo::make('Status', 'status', PostStatus::class)
                ->default(1)
                ->rules('required'),

            Boolean::make('Feature', 'is_featured'),

            MorphToMany::make('Authors', 'authors', User::class)
                ->fields(function (){
                    return [
                        Boolean::make('Lead Author', 'is_lead')
                    ];
                })
                ->pivots()
                ->rules('required'),

            MorphToMany::make('Tags', 'tags', Tag::class)
                ->rules('required'),


           BelongsToMany::make('Categories', 'categories', Category::class)
               ->fields(function (){
                   Text::make('Main Category', 'is_main');
               })
               ->rules('required'),

            MorphMany::make('Comments'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

}
