<template>
    <div class="w-full bg-[url('/bg.jpg')] bg-cover">

        <div class="md:grid grid-cols-2 py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div></div>
            <div class="text-right flex items-center">

                <div class="inline-block mr-10 text-white bg-opacity-25 bg-black sm:bg-transparent rounded-lg p-4">
                    <h1 class="text-4xl">Max Heckel</h1>
                    <h2 class="text-xl">Web Engineer</h2>
                    A <b>highly</b> motivated, <b>passionate</b> web <b>geek</b>.


                </div>
                <img class="shadow-lg border-2 border-white float-right inline-block rounded-full w-1/3 h-auto" src="/pfp.jpeg">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Hero"
}
</script>

<style scoped>

</style>
