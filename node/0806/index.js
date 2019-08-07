let fs=require('fs');
// let path=require('path');
// 读取文件内容 同步/异步
// let content=fs.readFileSync('demo.txt');
// console.log(content.toString());
// console.log('Queen');
// console.log('-----------');
//
// fs.readFile('demo.txt',function(err,data){
//     console.log(data.toString());
// });
// console.log('King');

// 创建200个文件
// let ext=['html','css','js','json','md','txt','doc','ppt','xlsx','pdf',];
// console.time('start');
// for(let i=1;i<201;i++){
//     let index=Math.floor(Math.random()*ext.length);
//     let filename='newdemo/'+i+'.'+ext[index];
//     fs.writeFileSync(filename);
// }
// console.timeEnd('start');

// 将文件分类
// let data = fs.readdirSync('./newdemo');
// for(let i=0;i<data.length;i++){
//     let name=data[i];
//     let ext=name.split('.').pop();
//     let filename='target/'+ext;
//     if(!fs.existsSync(filename)){
//         fs.mkdirSync(filename);
//     }
//     let oldpath='newdemo/'+name;
//     let newpath=filename+'/'+name;
//     fs.renameSync(oldpath,newpath);
// }

// 删除目录
function delFile(file){
    let data=fs.readdirSync(file);
    if(data.length>0){
        data.forEach(ele=>{
            let filepath=file+"/"+ele;
            let stats = fs.statSync(filepath);
            if(stats.isFile()){
                fs.unlinkSync(filepath);
            }else if(stats.isDirectory()){
                delFile(filepath);
            }
        })
    }
    fs.rmdirSync(file);
}
delFile('./newdemo');
