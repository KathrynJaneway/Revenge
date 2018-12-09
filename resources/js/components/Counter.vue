<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">

                        <div class='box'>
                            <div class='wave -one'></div>
                            <div class='wave -two'></div>
                            <div class='wave -three'></div>
                            <div class='title'>Saphira</div>
                        </div>

                        <!--<div id="wave"></div>-->
                        <button class="button-left" v-on:click="count++">+</button>
                        <label>{{ count < 0 ? count=0 : count }}</label>
                        <button class="button-right" v-on:click="count--">-</button>
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
