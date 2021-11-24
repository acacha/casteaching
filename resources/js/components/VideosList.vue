<template>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Videos
                        <button @click="refresh">
                            refresh
                        </button>
                    </h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            URL
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white" v-for="video in videos">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ video.id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ video.title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ video.description }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ video.url }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <video-show-link :video="video"></video-show-link>
                            <video-edit-link :video="video"></video-edit-link>
                            <video-destroy-link :video="video" @removed="refresh()"></video-destroy-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import VideoShowLink from "./VideoShowLink";
import VideoEditLink from "./VideoEditLink";
import VideoDestroyLink from "./VideoDestroyLink";
import bus from '../bus.js'

export default
{
    name: "VideosList",
    components: {
        'video-show-link': VideoShowLink,
        'video-edit-link': VideoEditLink,
        'video-destroy-link': VideoDestroyLink
    },
    data() {
        return {
    //         [
    //             {
    //                 "id": 1,
    //                 "title": "Vídeo 1",
    //                 "description": "Bla bla bla",
    //                 "url": "https://youtu.be/a-3kfT9hZk4",
    //                 "published_at": null
    //             },
    //     {
    //         "id": 2,
    //         "title": "Vídeo 2",
    //         "description": "Bla bla bla",
    //         "url": "https://youtu.be/a-3kfT9hZk4",
    //         "published_at": null
    //     },
    //     {
    //         "id": 3,
    //         "title": "Vídeo 3",
    //         "description": "Bla bla bla",
    //         "url": "https://youtu.be/a-3kfT9hZk4",
    //         "published_at": null,},
    //     {}
    //
    // ]
            videos: []
        }
    },
    async created() {
        this.getVideos()
        bus.$on('created',() => {
            this.refresh()
        });
        bus.$on('updated',() => {
            this.refresh()
        });
    },
    methods: {
        async getVideos() {
            this.videos = await window.casteaching.videos()
        },
        async refresh() {
            this.getVideos()
        }
    }
}
</script>

<style scoped>

</style>
