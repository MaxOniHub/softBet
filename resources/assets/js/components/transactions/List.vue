<template>
    <div>
        <table class="table">
            <thead>
                <th>Transaction ID</th>
                <th>Date/Time</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>Currency</th>
            </thead>
            <tbody>
                <template v-if="!transactions.length">
                    <tr>
                        <td colspan="4" class="text-center">No transactions Available</td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="transaction in transactions" :key="transaction.transactionId">
                        <td>{{ transaction.transactionId }}</td>
                        <td>{{ transaction.date }}</td>
                        <td>{{ transaction.customerId }}</td>
                        <td>{{ transaction.amount.value }}</td>
                        <td>{{ transaction.amount.currency }}</td>
                        <td>
                            <router-link :to="`/transactions/${transaction.transactionId}`">View</router-link>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'list',
        mounted() {
            if (this.transactions.length) {
                return;
            }
            
            this.$store.dispatch('getTransactions');
        },
        computed: {
            transactions() {
                return this.$store.getters.transactions;
            }
        }
    }
</script>

<style scoped>
.btn-wrapper {
    text-align: right;
    margin-bottom: 20px;
}
</style>
