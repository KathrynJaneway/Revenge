<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">
                        <button v-on:click="count++">+</button>
                        <label>{{ count }}</label>
                        <button v-on:click="count--">-</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function () {
            return {
                count: 0
            }
        }
    }
</script>
