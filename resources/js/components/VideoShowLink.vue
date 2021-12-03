<template>
    <a :href="'/videos/' + video.id" target="_blank" class="text-indigo-600 hover:text-indigo-900">Show</a>
</template>

<script>
export default {
    name: "VideoShowLink",
    props: {
        video: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
