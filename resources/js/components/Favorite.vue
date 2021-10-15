<template>
    <button @click="toggle" :class="isFavorited ? 'text-indigo-600' : ''">
        {{ favoritesCount }}
    </button>
</template>

<script>
export default {
    props: ["reply"],

    data() {
        return {
            favoritesCount: this.reply.favoritesCount,
            isFavorited: this.reply.isFavorited
        };
    },

    computed

    methods: {
        async toggle() {
            if (this.isFavorited) {
                await axios.delete(this.endPoint);

                this.isFavorited = false;
                this.favoritesCount--;
            } else {
                await axios.post(this.endPoint);

                this.isFavorited = true;
                this.favoritesCount++;
            }
        }
    }
};
</script>
