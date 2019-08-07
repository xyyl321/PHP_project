/**
 * Created by Yuanyuan Xu on 2019/8/5.
 */
let sum=require('./add.js');
let multiply=require('./multiply');
function size(num1,num2,ysf) {
    let result;
    switch(ysf){
        case '+':
            result=num1+num2;
            break;
        case '-':
            result=num1-num2;
            break;

    }
    console.log(result);
}
// size(2,4,'+');
console.log(sum.aa(1,10));
console.log(multiply.bb(2,5));