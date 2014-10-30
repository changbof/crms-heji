**SR bookFactory**是一款简洁而优秀的在线文档工具，同时支持xml、HTML富文本编辑及markdown语法，界面简洁优雅，中文排版优秀，具有优秀的书写和阅读体验。能生成多种书籍格式，如html、pdf等，是产品文档、项目文档、个人笔记的良好搭档。
 

> SR BookFactory，为文档而生！

-------------------

## 使用SR BookFactory可以做什么
可用SR BookFactory可以便捷高效地书写和整理各类文档，同时可以享受优雅的阅读体验以及生成、导出及打印的便捷。

> - 简洁和优雅的编写和阅读的界面
> - 简洁和高效地管理方式
> - 支持xml、HTML富文本编辑和Markdown语法
> - 支持代码高亮
> - 支持MathJax公式
> - 优雅美观的中文排版，注重阅读体验
> - 一致排版、十分方便
> - 一键生成多种目标格式文档

## Markdown语法简介

> Markdown 是一种轻量级标记语言，它允许人们使用易读易写的纯文本格式编写文档，然后转换成格式丰富的HTML页面。    
—— [维基百科](https://zh.wikipedia.org/wiki/Markdown)

例如本文，使用简单的符号可以标识不同的标题，将某些文字标记为**粗体**， *斜体*， ~~删除线~~，还可以插入代码`puts "helloworld"`，更高级地还可以插入表格、代码块和公式，例如：

### 代码块

```c
#include <stdio.h>

int main() {
   int a = 23, b = 47;
   
   printf("Before. a: %d, b: %d\n", a, b);
   a ^= b;
   b ^= a;
   a ^= b;
   printf("After.  a: %d, b: %d\n", a, b);
   return 0;
}

```
> 其他语言的代码高亮示例请查看文档[Raysnote代码高亮示例](/notes/d955bad3fde04cc8860e9d105f2b1334)。

### MathJax 公式[^math]
$$   P(E)   = {n \choose k} p^k (1-p)^{ n-k}   $$

### 表格
| 商品         |     价格     | 数量  |
| :----------- | -----------: | :--: |
| Macbook Pro  | 1,299.00 USD |  8   |
| iPhone 5S    | 674.97 USD   |  128  |
| iPad Air     |    1.00 USD  | 1024  |


## 相关链接
- [Markdown简明语法速成](/markdown-get-started)
- [数学公式示例](/math-examples)
- [代码高亮示例](/code-examples)
- [反馈和建议](/advise)

