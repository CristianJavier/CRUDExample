
const Create= ()=> import('./components/crud/create.vue')
const Show = ()=> import('./components/crud/Show.vue')
const Edit = ()=> import('./components/crud/Edit.vue')


export const routes = [
    {
        name:'showCrud',
        path: '/',
        component: Show
    },
    {
        name:'createCrud',
        path: '/create',
        component: Create
    },
    {
        name:'editCrud',
        path: '/edit/:id',
        component: Edit
    },
    
]