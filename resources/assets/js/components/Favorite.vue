<template>
    <span>
        <a href="#" class="btn btn-floating white" v-if="isFavorited" @click.prevent="unFavorite(artikel)"><i class="animated bounceIn red-text fa fa-heart"></i>
        </a>
        <a href="#" class="btn btn-floating white" v-else @click.prevent="favorite(artikel)">
            <i class="animated bounceIn black-text fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['artikel', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(artikel) {
                axios.post('/favorite/'+artikel)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data))
                    .then(Materialize.toast('<i class="fa fa-folder"></i> Di tambahkan ke favorite', 3000,'rounded'));
            },

            unFavorite(artikel) {
                axios.post('/unfavorite/'+artikel)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data))
                    .then(Materialize.toast('<i class="mdi mdi-delete-forever"></i> Di hapus dari favorite', 3000,'rounded'));
            }
        }
    }
</script>