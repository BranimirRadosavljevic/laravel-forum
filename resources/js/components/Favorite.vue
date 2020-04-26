<template>
    <div>
        <button :class="classes" type="submit" @click="toggle">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentcolor" class="heart">
                    <path d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"></path>
                </svg>
            </span>
                <span v-text="favoritesCount"></span>
        </button>
    </div>
    
</template>
<script>
export default {
    props: ['reply'],

    data() {
        return {
            favoritesCount: this.reply.favoritesCount,
            isFavorited: this.reply.isFavorited 
        }
    },

    computed: {
        classes() {
            return ['btn', this.isFavorited ? 'btn-primary' : 'btn-outline-secondary'];
        }
    },

    methods: {
        toggle() {
            if(this.isFavorited){
                axios.delete('/replies/' + this.reply.id + '/favorites');
                this.isFavorited = false;
                this.favoritesCount--;
            } else {
                axios.post('/replies/' + this.reply.id + '/favorites');
                this.isFavorited = true;
                this.favoritesCount++;
            }
        }
    },
}
</script>