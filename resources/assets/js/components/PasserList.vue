<template>
    <div>
        <div class="row border-bottom">
            <div class="col-sm-4 font-bold text-center">
                Name
            </div>
            <div class="col-sm-4 font-bold text-center">
                School
            </div>
            <div class="col-sm-2 font-bold text-center">
                Campus
            </div>
            <div class="col-sm-2 font-bold text-center">
                Division
            </div>
        </div>
        <div class="container h-1/2-screen overflow-scroll">
            <div v-for="passer in passers.passers" :key="passer.id" class="row">
                <div class="col-sm-4 font-thin text-sm">
                    {{passer.name}}
                </div>
                <div class="col-sm-4 font-thin text-sm text-center">
                    {{passer.school}}
                </div>
                <div class="col-sm-2 font-thin text-sm text-center">
                    {{passer.campus}}
                </div>
                <div class="col-sm-2 font-thin text-sm text-center">
                    {{passer.division}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ["passers"]

    }
</script>
