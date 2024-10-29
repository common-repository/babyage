Baby Age 0.4
在页面中显示宝宝多大了。

== 安装 ==

1. 压缩包解压到WPDIR/wp-content/plugins/babyage/下，如果没有babyage文件夹，请自己建立。解压后，有5个文件。

2. 编辑config.php，可以修改：设置语言文件、时区和宝宝的出生时间：$bornYear，$bornMonth，$bornDay这些变量。
3. 0.4版本启用了一个钩子：before_sidebar，自动生成插件需要的div，如果您的wp不支持这个钩子，请查看第4步，否则，请忽略第4步。

[4. 您当前使用的theme，根据您想显示的位置，编辑相应的文件，增加“<div id="babyage" style="padding-bottom:10px;"></div>”即可。比如我修改的是sidebar.php，这样就显示在页面的侧边栏。]

5. 后台启用插件即可。

== 支持 ==
URL: http://zgia.net/?p=5
Email: wuliuqiba@gmail.com
