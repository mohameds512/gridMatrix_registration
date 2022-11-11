<template>
    <div>
        <h1>index</h1>
        <div>
            <button @click="gridMatrix()"> gridMatrix </button>
        </div>
    </div>
</template>
<script>
export default {
    methods:{
        gridMatrix(){
            let counter = 0 ;
            let grid= [[4,3,2,-1],[3,2,1,-1],[1,1,-1,-2],[-1,-1,-2,-3]]
            let m = grid.length;
            for (let i = 0; i < m ; i++) {
                let n = grid[i].length;
                for (let j = 0; j < n ; j++) {
                    if (grid[i][j] < 0) {
                        counter = counter + 1 ;
                    }
                }
            }
            console.log(counter);
        }
    }
}
</script>

