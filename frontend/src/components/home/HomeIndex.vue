<template>
    <toolbar/>

    <month-toggler/>

    <summary-balance/>

    <div class="row category-balance-box">
        <div class="col-4 category-balance income">
            <div class="title">Title</div>
            <div class="icon-box">
                <font-awesome-icon icon="home"/>
            </div>
            <div class="balance">500</div>
        </div>

        <div class="col-4 category-balance">
            <div class="title">Title</div>
            <div class="icon-box">
                <font-awesome-icon icon="home"/>
            </div>
            <div class="balance">500</div>
        </div>

        <div class="col-4 category-balance">
            <div class="title">Title</div>
            <div class="icon-box">
                <font-awesome-icon icon="home"/>
            </div>
            <div class="balance">500</div>
        </div>

        <div class="col-4 category-balance">
            <div class="title">Title</div>
            <div class="icon-box">
                <font-awesome-icon icon="home"/>
            </div>
            <div class="balance">500</div>
        </div>
    </div>
</template>

<script>

import Toolbar from "@/components/widgets/Toolbar.vue";
import MonthToggler from "@/components/widgets/MonthToggler.vue";
import SummaryBalance from "@/components/widgets/SummaryBalance.vue";

export default {
    components: {SummaryBalance, MonthToggler, Toolbar},
    data() {
        return {

        }
    },
}
</script>