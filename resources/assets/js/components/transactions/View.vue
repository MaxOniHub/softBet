<template>
    <div class="transaction-view" v-if="transaction">
        <div class="user-info">
            <table class="table">
                <tr>
                    <th>Transaction ID</th>
                    <td>{{ transaction.transactionId }}</td>
                </tr>
                <tr>
                    <th>Date/Time</th>
                    <td>{{ transaction.date }}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{ transaction.customerId }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ transaction.amount.value }}</td>
                </tr>
                <tr>
                    <th>Currency</th>
                    <td>{{ transaction.amount.currency }}</td>
                </tr>
            </table>
            <router-link to="/transactions">Back to all transactions</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'view',
        created() {
            if (this.transactions.length) {
                this.transaction = this.transactions.find((transaction) => transaction.transactionId == this.$route.params.id);
            } else {
                axios.get(`/api/v1/transactions/${this.$route.params.id}`)
                    .then((response) => {
                        this.transaction = response.data.data
                    });
            }
        },
        data() {
            return {
                transaction: null
            };
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser;
            },
            transactions() {
                return this.$store.getters.transactions;
            }
        }
    }
</script>

<style scoped>
.transaction-view {
    display: flex;
    align-items: center;
}
.user-img {
    flex: 1;
}
.user-img img {
    max-width: 160px;
}
.user-info {
    flex: 3;
}
</style>
