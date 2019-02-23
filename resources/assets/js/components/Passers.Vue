<template>
    <div>
        <fetch-json :url="url" class="mb-8">
            <div class="card h-3/4-screen" slot-scope="{ response }">
                <div>
                    <div class="container">
                        <label>Show
                            <select v-model="limit">
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                            entries
                        </label>
                        <passer-list :passers="response"></passer-list>
                        <pagination class="row p-4" :pages="pages(response)" :currentPage.sync="currentPage"></pagination>
                    </div>
                </div>
            </div>
        </fetch-json>
    </div>
</template>

<script>
    import PasserList from "./PasserList.vue"
    import FetchJson from "./FetchJson.vue"
    import Pagination from "./Pagination.vue"

    export default {
        components: {
            PasserList,
            FetchJson,
            Pagination
        },
        data() {
            return {
                limit: 50,
                currentPage: 1
            }
        },
        computed: {
            url() {
                let offset = (this.currentPage - 1) * this.limit
                return `/api/passers?offset=${offset}&limit=${this.limit}&order=name&direction=asc`
            },
        },
        methods: {
            pages(passers) {
                if (passers.passersCount <= this.limit) {
                    return []
                }
                return [...Array(Math.ceil(passers.passersCount / this.limit)).keys()].map(e => e + 1)
            }
        }
    }
</script>
