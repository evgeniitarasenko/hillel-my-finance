<template>
   <div class="row month-toggler">
       <div class="col-auto">
           <div class="prev">
               <font-awesome-icon icon="angle-left"/>
           </div>
       </div>
       <div class="col-auto">
           <div class="month">
               <font-awesome-icon icon="calendar"/>
               May, 2023
           </div>
       </div>
       <div class="col-auto">
           <div class="next">
               <font-awesome-icon icon="angle-right"/>
           </div>
       </div>
   </div>
</template>

<script>

import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

export default {
    components: {FontAwesomeIcon},
    data() {
        return {

        }
    },
}
</script>