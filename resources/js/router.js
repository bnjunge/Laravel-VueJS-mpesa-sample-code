import Home from './components/Setting'
import About from './components/About'
import Stk from './components/Stk'
import Simulate from './components/Simulate'
import Register from './components/Register'
import B2C from './components/B2CPayment'

export default{
    mode: 'history',

    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/mpesa-access-token',
            component: About
        },
        {
            path: '/mpesa-stk',
            component: Stk
        },
        {
            path: '/mpesa-simulate',
            component: Simulate
        },
        {
            path: '/mpesa-register-url',
            component: Register
        },
        {
            path: '/mpesa-b2c',
            component: B2C
        }
    ]
}