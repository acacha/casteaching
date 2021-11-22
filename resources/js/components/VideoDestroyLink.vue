<template>
    <a class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
       @click="remove()">Delete</a>
</template>

<script>
export default {
    name: "VideoShowLink",
    props: {
        video: {
            type: Object,
            required: true
        }
    },
    methods: {
        async remove() {
            await window.casteaching.video.destroy(this.video.id)
        }
    }
}
</script>

<style scoped>

</style>
