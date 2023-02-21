const test = async ()=>{
let a = await console.log("a")
let b = await bx()
console.log("c")
}
function bx(){
    const myTimeout = setTimeout(console.log('b'), 5000);
}
bx()