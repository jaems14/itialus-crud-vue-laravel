<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    Title: '',
    Description: '',
    Status: '',
    User_Id: '',
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Task - Create</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form @submit.prevent="form.post(route('task.store'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="Title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Title"
                    required
                    autofocus
                    autocomplete="Title"
                />

                <InputError class="mt-2" :message="form.errors.Title" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Description"
                    required
                    autocomplete="Description"
                />

                <InputError class="mt-2" :message="form.errors.Description" />
            </div>
            <label for="Status" class="block text-sm font-medium text-gray-900 dark:text-white">Select Status</label>
            <select id="Status" v-model="form.Status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a status</option>
                <option value="Not Completed">Not Completed</option>
                <option value="Completed">Completed</option>
            </select>
            <div>
                <InputLabel for="user_id" value="User" />

                <TextInput
                    id="user_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.User_Id"
                    required
                    autocomplete="User_Id"
                />

                <InputError class="mt-2" :message="form.errors.User_Id" />
            </div>
            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                </Transition>
            </div>
        </form>
   
                </div>
                </div>
                </div>

    </AuthenticatedLayout>
</template>
