<template>
    <div class="row summary-balance">
        <div class="col">
            <div class="summary-item expenses">
                <font-awesome-icon icon="coins"/>
                <div class="amount">-12 000</div>
                <div class="description">Expenses</div>
            </div>
        </div>
        <div class="col">
            <div class="summary-item balance">
                <font-awesome-icon icon="wallet"/>
                <div class="amount positive">+12 000</div>
                <div class="description">Balance</div>
            </div>
        </div>
        <div class="col">
            <div class="summary-item income">
                <font-awesome-icon icon="building-columns"/>
                <div class="amount">+12 000</div>
                <div class="description">Income</div>
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