<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>
<script>
export default {
    data() {
        return {
            tasks: [],
        }
    },  
    created() {
        this.getTask();
    },
    mounted() {
        // this.ini();
    },
    methods: {
        // ini() 
        getTask() {
            axios.get("/task/show").then(response => {
                this.tasks = response.data;
            });
        }
    },
}
</script>
<template>
    <Head title="Task" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Task</h2>
    <a class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="task/create">Create</a>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="(item,index) in tasks" :key="index">
                                        <td class="">
                                            {{item.Title}}
                                        </td>
                                        <td class="">
                                            {{item.Description}}
                                        </td>
                                        <td class="">
                                            {{item.Status}}
                                        </td>
                                        <td class="">
                                            {{item.User_Id}}
                                        </td>
                                        <td class="">
<a  :href="`task/update/`+item.id" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</a>
<a href="task/delete" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</a>

                                        </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
