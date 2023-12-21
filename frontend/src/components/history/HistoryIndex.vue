<template>
    <toolbar/>

    <month-toggler/>

    <summary-balance/>

    <div class="day">
        <div class="row day-header">
            <div class="col-auto date">Dec, 12th</div>
            <div class="col-auto summary">+1621</div>
        </div>

        <div class="day-transactions">
            <div class="row transaction">
                <div class="col-auto general">
                    <div class="icon-box">
                        <font-awesome-icon icon="home"/>
                    </div>
                    <div>
                        <div class="transaction-title">Transaction title</div>
                        <div class="category-title">Category Title</div>
                    </div>
                </div>
                <div class="col-auto amount">
                    -500
                </div>
            </div>

            <div class="row transaction">
                <div class="col-auto general">
                    <div class="icon-box">
                        <font-awesome-icon icon="home"/>
                    </div>
                    <div>
                        <div class="transaction-title">Transaction title</div>
                        <div class="category-title">Category Title</div>
                    </div>
                </div>
                <div class="col-auto amount">
                    -500
                </div>
            </div>
        </div>
    </div>

    <div class="day">
        <div class="row day-header">
            <div class="col-auto date">Dec, 12th</div>
            <div class="col-auto summary">+1621</div>
        </div>

        <div class="day-transactions">
            <div class="row transaction">
                <div class="col-auto general">
                    <div class="icon-box">
                        <font-awesome-icon icon="home"/>
                    </div>
                    <div>
                        <div class="transaction-title">Transaction title</div>
                        <div class="category-title">Category Title</div>
                    </div>
                </div>
                <div class="col-auto amount">
                    -500
                </div>
            </div>

            <div class="row transaction">
                <div class="col-auto general">
                    <div class="icon-box">
                        <font-awesome-icon icon="home"/>
                    </div>
                    <div>
                        <div class="transaction-title">Transaction title</div>
                        <div class="category-title">Category Title</div>
                    </div>
                </div>
                <div class="col-auto amount">
                    -500
                </div>
            </div>
        </div>
    </div>

    <div class="add-transaction-button">
        <font-awesome-icon icon="plus"/>
        Add new
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