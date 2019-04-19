<template>
   <div class="row">
      <!-- <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="table">
                <table border="1">
                    <tr>
                        <th>blub</th>
                        <td>hallo</td>
                        <td>blub</td>
                    </tr>
                    <tr>
                        <th>mip</th>
                        <td>mop</td>
                        <td>knop</td>
                    </tr>

                </table>
            </div>
       </div>-->
       <!--<div class="col-xs-6 col-md-4">-->
            <div class="btn-group">
                <button class="button-left" v-on:click="count++">+</button>
                <label>{{ count < 3 ? count=3 : count }}</label>
                <button class="button-right" v-on:click="count--">-</button>
            </div>
       <!--</div>-->
   </div>
</template>

<script>
    export default {
        data : function () {
            return {
                count: 3
            }
        }
    }
</script>
