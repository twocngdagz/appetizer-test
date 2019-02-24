<template>
    <div class="max-w-sm mx-auto">
        <div class="card">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="passer-name">Name</label>
                        <input type="text" class="form-control md:uppercase" v-model="name" @input="$v.name.$touch" :class="{'is-invalid': $v.name.$error}" id="passer-name" placeholder="Name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="passer-school">School</label>
                        <input type="text" class="form-control md:uppercase" v-model="school" @input="$v.school.$touch" :class="{'is-invalid': $v.school.$error}" id="passer-school" placeholder="School">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="passer-campus">Campus</label>
                        <input type="text" class="form-control md:uppercase" v-model="campus" @input="$v.campus.$touch" :class="{'is-invalid': $v.campus.$error}" id="passer-campus" placeholder="Campus">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="passer-division">Division</label>
                        <input type="text" class="form-control md:uppercase" v-model="division" @input="$v.division.$touch" :class="{'is-invalid': $v.division.$error}" id="passer-division" placeholder="Division">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" @click.prevent="submit">Submit form</button>
                <router-link :to="{ name: 'home'}" class="btn btn-danger">Back</router-link>
            </form>
        </div>
    </div>
</template>


<script>
    import { required } from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                name: "",
                school: "",
                campus: "",
                division: ""
            }
        },
        methods: {
            submit() {
                console.log(this.valid)
                if (this.valid) {
                    axios.post('/api/passers', {
                        passer: {
                            name: this.name.toUpperCase(),
                            school: this.school.toUpperCase(),
                            division: this.division.toUpperCase(),
                            campus: this.campus.toUpperCase()
                        }
                    }).then(response => {
                        if (response.status == 200 && response.data.passer.id) {
                            this.$router.push({name: 'home'})
                        }
                    })
                    .catch((error) => {
                        throw new Error(`Error fetching ${error}`)
                    })
                } else {
                    this.$v.name.$touch()
                    this.$v.campus.$touch()
                    this.$v.school.$touch()
                    this.$v.division.$touch()
                }
            },
            toUpperCase(e) {

            }
        },
        computed: {
            valid() {
                return !this.$v.$invalid
            }
        },
        validations: {
            name: {
                required,
            },
            school: {
                required,
            },
            campus: {
                required,
            },
            division: {
                required
            }
        }
    }
</script>
