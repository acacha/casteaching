<template>
    <a class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
       @click="remove()">Delete</a>
</template>

<script>
export default {
    name: "VideoDestroyLink",
    props: {
        video: {
            type: Object,
            required: true
        }
    },
    methods: {
        async remove() {
            try {
                await window.casteaching.video.destroy(this.video.id)
                this.$emit('removed')
            } catch (error) {
                console.log(error);
            }


        }
    }
}
</script>

<style scoped>

</style>
