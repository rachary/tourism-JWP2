<template>
        <table>
            <thead>
                <slot name="head"></slot>
            </thead>
            <tbody>
                <slot></slot>
            </tbody>
        </table>
</template>

<style scoped>
table{
    min-width: 100%;
    border-radius: .2rem;
}

</style>