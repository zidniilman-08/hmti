<template src="./Forums.html"></template>

<script>
    export default {
        data() {
            return {
                showForums: false,
                query: '',
                judulTopik: '',
                isiTopik: '',
                results: []
            }
        },
        methods: {
            addForum(judulTopik, isiTopik) {
                axios.post('/api/addforums', {
                    judul_topik: judulTopik, isi_topik: isiTopik
                }).then(res => {
                    if(res.data) {
                        this.judulTopik = this.isiTopik = "";
                    }
                });
            },
            autoComplete() {
                this.results = [];
                if(this.query.length > 2) {
                    axios.get('/api/search',
                     {params : {query: this.query}}).then(response => {
                        this.results = response.data;
                     });
                }
            }
        },
        mounted() {
        }
    }
</script>
