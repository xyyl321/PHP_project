/**
 * Created by Yuanyuan Xu on 2019/8/7.
 */
// let http=require('0807/http');
// let fs=require('0807/fs');
//
// let server=http.createServer((res,req)=>{
//     let url=req.url;
//     if(url!='favicom.ico'){
//         url=='/' && (url='/index.html');
//
//         let filePath='./view'+url;
//         if(fs.existsSync(filePath)){
//             fs.readFile(filePath,(error,data)=>{
//                 if(error){
//                     throw error;
//                 }
//                 res.end(data);
//             })
//         }else{
//             res.end('404');
//         }
//     }
// })

let http=require('http');
let fs=require('fs');
const mime=require('mime');
let path=require('path');

let serve = http.createServer((req,res)=>{
   let url=req.url;
   // console.log(url);
   if(url != '/favicon.ico'){
       url=='/' && (url='/index.html');
       let filePath='./view'+url;
       let extName=path.extname(url).substring(1);
       if(fs.existsSync(filePath)){
           fs.readFile(filePath,(err,data)=>{
               if(err){
                   throw err;
               }else{
                   let mimeType=mime.getType(extName);
                   res.setHeader('Content-type',mimeType);
                   res.end(data);
               }
           })
       }else{
           res.end('404');
       }
    }
});
serve.listen(4000);