<script setup>
import { router } from "@inertiajs/vue3";
import Container from "../../Components/Container.vue";

const props = defineProps({
    quiz: Object,
});
</script>

<template>
    <Head title="- Quiz Detail" />
    <Container class="flex gap-4">
        <div class="w-1/4 rounded-md overflow-hidden">
            <img
                :src="
                    quiz.image
                        ? `/storage/${quiz.image}`
                        : '/storage/images/quiz/default.jpg'
                "
                class="w-full h-full object-cover object-center"
                alt=""
            />
        </div>

        <div class="w-3/4">
            <!-- quiz info -->
            <div class="mb-6">
                <div class="flex items-end justify-between mb-2">
                    <p class="text-slate-400 w-full border-b">quiz detail</p>

                </div>

                <h3 class="font-bold text-2xl mb-4">{{ quiz.title }}</h3>
                <p>{{ quiz.description }}</p>
            </div>

            <!-- info -->
            <div class="mb-6">
                <p class="text-slate-400 w-full border-b mb-2">Info</p>

                <!-- Difficulty -->
                <div class="flex justify-between2 w-full">
                <div class="flex items-center mb-2 gap-2 w-1/2">
                    <p>Difficulty:</p>
                    <button
                        class="bg-orange-400 text-white px-2 py-px rounded-full hover:bg-orange-500 dark:hover:bg-orange-700"
                    >
                    {{ quiz.difficulty }}
                    </button>
                </div>

                <!-- category -->
                <div class="flex items-center mb-2 gap-2 w-1/2">
                    <p>Category:</p>
                    <button
                        class="bg-slate-500 text-white px-2 py-px rounded-full hover:bg-slate-700 dark:hover:bg-slate-900"
                    >
                    {{ quiz.category.name }}
                    </button>
                </div>
                </div>


                <div class="flex justify-between2 w-full">
                <!-- time -->
                <div class="flex items-center mb-2 gap-2 w-1/2">
                    <p>Time:</p>
                    <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>{{ quiz.time_limit_seconds }} s</span>
                </div>
                </div>

                <!-- question count -->
                <div class="flex items-center mb-2 gap-2 w-1/2">
                    <p>Question:</p>
                    <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
</svg>
                    <span>{{ quiz.questions_count }}</span>
                </div>
                </div>
            </div>

                <!-- User -->
                <div class="flex items-center mb-2 gap-2">
                    <i class="fa-solid fa-user"></i>
                    <p>Listed by:</p>
                    <Link
                        :href="route('home', { user_id: quiz.user.id })"
                        class="text-link"
                    >
                    {{ quiz.user.username }}
                    </Link>
                </div>
            </div>

            <div class="">
                <button class="flex px-4 py-3 bg-blue-500 hover:bg-blue-600 rounded shadow text-white font-bold text-lg text-center">
                    Start Quiz
                </button>
            </div>
            
        </div>
    </Container>
</template>