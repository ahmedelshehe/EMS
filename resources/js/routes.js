import EmployeeIndex from './components/employees/Index';
import EmployeeCreate from './components/employees/Create';
import EmployeeEdit from './components/employees/Edit';
export const routes =[
    {
        path:"/employees",
        name:"EmployeeIndex",
        component:EmployeeIndex
    },
    {
        path:"/employees/create",
        name:"EmployeeCreate",
        component:EmployeeCreate
    },
    {
        path:"/employees/edit/:id",
        name:"EmployeeEdit",
        component:EmployeeEdit
    }
];