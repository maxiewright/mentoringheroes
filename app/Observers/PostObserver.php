<?php
//
//namespace App\Observers;
//
//use App\Models\Posts;
//
//class PostObserver
//{
//    /**
//     * Handle the post "created" event.
//     *
//     * @param  \App\Models\Posts  $post
//     * @return void
//     */
//    public function created(Posts $post)
//    {
//        if ($post->post_status_id == 3){
//            $post->update([
//                'published_at' => now(),
//            ]);
//        }
//    }
//
//    /**
//     * Handle the post "updated" event.
//     *
//     * @param  \App\Models\Posts  $post
//     * @return void
//     */
//    public function updated(Posts $post)
//    {
//        if ($post->post_status_id == 3){
//            $post->update([
//                'published_at' => now(),
//            ]);
//        }
//    }
//
//    /**
//     * Handle the post "deleted" event.
//     *
//     * @param  \App\Models\Posts  $post
//     * @return void
//     */
//    public function deleted(Posts $post)
//    {
//        //
//    }
//
//    /**
//     * Handle the post "restored" event.
//     *
//     * @param  \App\Models\Posts  $post
//     * @return void
//     */
//    public function restored(Posts $post)
//    {
//        //
//    }
//
//    /**
//     * Handle the post "force deleted" event.
//     *
//     * @param  \App\Models\Posts  $post
//     * @return void
//     */
//    public function forceDeleted(Posts $post)
//    {
//        //
//    }
//}
