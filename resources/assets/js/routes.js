import Home from './components/Home.vue';
import Login from './components/auth/Login.vue';
import TransactionsMain from './components/transactions/Main.vue';
import TransactionsList from './components/transactions/List.vue';
import Transaction from './components/transactions/View.vue';

export const routes = [
    {
        path: '/',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/transactions',
        component: TransactionsMain,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: '/',
                component: TransactionsList
            },
            {
                path: ':id',
                component: Transaction
            }
        ]
    }
];