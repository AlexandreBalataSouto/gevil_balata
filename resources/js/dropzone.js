<!DOCTYPE html>
<html class="" lang="en">
<head prefix="og: http://ogp.me/ns#">
<meta charset="utf-8">
<link href="https://assets.gitlab-static.net" rel="dns-prefetch">
<link crossorigin="" href="https://assets.gitlab-static.net" rel="preconnnect">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="object" property="og:type">
<meta content="GitLab" property="og:site_name">
<meta content="src/dropzone.js · master · Matias Meno / Dropzone" property="og:title">
<meta content="Dropzone is an easy to use drag&#39;n&#39;drop library. It supports image previews and shows nice progress bars. http://www.dropzonejs.com" property="og:description">
<meta content="/uploads/-/system/project/avatar/2712276/dropzone-logo.png" property="og:image">
<meta content="64" property="og:image:width">
<meta content="64" property="og:image:height">
<meta content="https://gitlab.com/meno/dropzone/blob/master/src/dropzone.js" property="og:url">
<meta content="summary" property="twitter:card">
<meta content="src/dropzone.js · master · Matias Meno / Dropzone" property="twitter:title">
<meta content="Dropzone is an easy to use drag&#39;n&#39;drop library. It supports image previews and shows nice progress bars. http://www.dropzonejs.com" property="twitter:description">
<meta content="/uploads/-/system/project/avatar/2712276/dropzone-logo.png" property="twitter:image">

<title>src/dropzone.js · master · Matias Meno / Dropzone · GitLab</title>
<meta content="Dropzone is an easy to use drag&#39;n&#39;drop library. It supports image previews and shows nice progress bars. http://www.dropzonejs.com" name="description">
<link rel="shortcut icon" type="image/png" href="https://gitlab.com/assets/favicon-7901bd695fb93edb07975966062049829afb56cf11511236e61bcf425070e36e.png" id="favicon" data-original-href="https://gitlab.com/assets/favicon-7901bd695fb93edb07975966062049829afb56cf11511236e61bcf425070e36e.png" />
<link rel="stylesheet" media="all" href="https://assets.gitlab-static.net/assets/application-b89ffbea40d8273cca0984b8e002f12b6703d9a7e04182574b14005a36ed861e.css" />
<link rel="stylesheet" media="print" href="https://assets.gitlab-static.net/assets/print-74c3df10dad473d66660c828e3aa54ca3bfeac6d8bb708643331403fe7211e60.css" />


<link rel="stylesheet" media="all" href="https://assets.gitlab-static.net/assets/highlight/themes/white-3144068cf4f603d290f553b653926358ddcd02493b9728f62417682657fc58c0.css" />
<script nonce="Jp8uPR3NZmpw4+N8vgv9oQ==">
//<![CDATA[
window.gon={};gon.api_version="v4";gon.default_avatar_url="https://assets.gitlab-static.net/assets/no_avatar-849f9c04a3a0d0cea2424ae97b27447dc64a7dbfae83c036c45b403392f0e8ba.png";gon.max_file_size=10;gon.asset_host="https://assets.gitlab-static.net";gon.webpack_public_path="https://assets.gitlab-static.net/assets/webpack/";gon.relative_url_root="";gon.shortcuts_path="/help/shortcuts";gon.user_color_scheme="white";gon.sentry_dsn="https://526a2f38a53d44e3a8e69bfa001d1e8b@sentry.gitlab.net/15";gon.sentry_environment=null;gon.gitlab_url="https://gitlab.com";gon.revision="22099353820";gon.gitlab_logo="https://assets.gitlab-static.net/assets/gitlab_logo-7ae504fe4f68fdebb3c2034e36621930cd36ea87924c11ff65dbcb8ed50dca58.png";gon.sprite_icons="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg";gon.sprite_file_icons="https://gitlab.com/assets/file_icons-7262fc6897e02f1ceaf8de43dc33afa5e4f9a2067f4f68ef77dcc87946575e9e.svg";gon.emoji_sprites_css_path="https://assets.gitlab-static.net/assets/emoji_sprites-289eccffb1183c188b630297431be837765d9ff4aed6130cf738586fb307c170.css";gon.test_env=false;gon.disable_animations=null;gon.suggested_label_colors={"#0033CC":"UA blue","#428BCA":"Moderate blue","#44AD8E":"Lime green","#A8D695":"Feijoa","#5CB85C":"Slightly desaturated green","#69D100":"Bright green","#004E00":"Very dark lime green","#34495E":"Very dark desaturated blue","#7F8C8D":"Dark grayish cyan","#A295D6":"Slightly desaturated blue","#5843AD":"Dark moderate blue","#8E44AD":"Dark moderate violet","#FFECDB":"Very pale orange","#AD4363":"Dark moderate pink","#D10069":"Strong pink","#CC0033":"Strong red","#FF0000":"Pure red","#D9534F":"Soft red","#D1D100":"Strong yellow","#F0AD4E":"Soft orange","#AD8D43":"Dark moderate orange"};gon.first_day_of_week=0;gon.ee=true;gon.features={"snippetsVue":false,"monacoSnippets":false,"monacoBlobs":false,"monacoCi":false};
//]]>
</script>

<script src="https://assets.gitlab-static.net/assets/webpack/runtime.93485e43.bundle.js" defer="defer"></script>
<script src="https://assets.gitlab-static.net/assets/webpack/main.228d5d07.chunk.js" defer="defer"></script>
<script src="https://assets.gitlab-static.net/assets/webpack/sentry.c752a2a0.chunk.js" defer="defer"></script>
<script src="https://assets.gitlab-static.net/assets/webpack/commons~pages.admin.clusters~pages.admin.clusters.destroy~pages.admin.clusters.edit~pages.admin.clus~f0c3891a.31143ada.chunk.js" defer="defer"></script>
<script src="https://assets.gitlab-static.net/assets/webpack/commons~pages.groups.epics.index~pages.groups.epics.show~pages.groups.milestones.edit~pages.groups.m~b7d7bc7f.5bb145b7.chunk.js" defer="defer"></script>
<script src="https://assets.gitlab-static.net/assets/webpack/pages.projects.blob.show.5b85aef1.chunk.js" defer="defer"></script>

<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="FZtdeVKdpaTMcbqTjKufvNeuSAG+51TBbNd9e5ZF9dOnRB42f4cX1BR79JhwYRJZFqH/Js/DuWDKHLBxri8EZA==" />
<meta name="csp-nonce" content="Jp8uPR3NZmpw4+N8vgv9oQ==" />
<meta content="origin-when-cross-origin" name="referrer">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="#474D57" name="theme-color">
<link rel="apple-touch-icon" type="image/x-icon" href="https://assets.gitlab-static.net/assets/touch-icon-iphone-5a9cee0e8a51212e70b90c87c12f382c428870c0ff67d1eb034d884b78d2dae7.png" />
<link rel="apple-touch-icon" type="image/x-icon" href="https://assets.gitlab-static.net/assets/touch-icon-ipad-a6eec6aeb9da138e507593b464fdac213047e49d3093fc30e90d9a995df83ba3.png" sizes="76x76" />
<link rel="apple-touch-icon" type="image/x-icon" href="https://assets.gitlab-static.net/assets/touch-icon-iphone-retina-72e2aadf86513a56e050e7f0f2355deaa19cc17ed97bbe5147847f2748e5a3e3.png" sizes="120x120" />
<link rel="apple-touch-icon" type="image/x-icon" href="https://assets.gitlab-static.net/assets/touch-icon-ipad-retina-8ebe416f5313483d9c1bc772b5bbe03ecad52a54eba443e5215a22caed2a16a2.png" sizes="152x152" />
<link color="rgb(226, 67, 41)" href="https://assets.gitlab-static.net/assets/logo-d36b5212042cebc89b96df4bf6ac24e43db316143e89926c0db839ff694d2de4.svg" rel="mask-icon">
<meta content="https://assets.gitlab-static.net/assets/msapplication-tile-1196ec67452f618d39cdd85e2e3a542f76574c071051ae7effbfde01710eb17d.png" name="msapplication-TileImage">
<meta content="#30353E" name="msapplication-TileColor">



<script nonce="Jp8uPR3NZmpw4+N8vgv9oQ==">
//<![CDATA[
;(function(p,l,o,w,i,n,g){if(!p[i]){p.GlobalSnowplowNamespace=p.GlobalSnowplowNamespace||[];
p.GlobalSnowplowNamespace.push(i);p[i]=function(){(p[i].q=p[i].q||[]).push(arguments)
};p[i].q=p[i].q||[];n=l.createElement(o);g=l.getElementsByTagName(o)[0];n.async=1;
n.src=w;g.parentNode.insertBefore(n,g)}}(window,document,"script","https://assets.gitlab-static.net/assets/snowplow/sp-e10fd598642f1a4dd3e9e0e026f6a1ffa3c31b8a40efd92db3f92d32873baed6.js","snowplow"));

window.snowplowOptions = {"namespace":"gl","hostname":"snowplow.trx.gitlab.net","cookieDomain":".gitlab.com","appId":"gitlab","formTracking":true,"linkClickTracking":true,"igluRegistryUrl":null}


//]]>
</script>
</head>

<body class="ui-indigo  gl-browser-chrome gl-platform-windows" data-find-file="/meno/dropzone/find_file/master" data-group="" data-namespace-id="762228" data-page="projects:blob:show" data-page-type-id="master/src/dropzone.js" data-project="dropzone" data-project-id="2712276">

<script nonce="Jp8uPR3NZmpw4+N8vgv9oQ==">
//<![CDATA[
gl = window.gl || {};
gl.client = {"isChrome":true,"isWindows":true};


//]]>
</script>


<header class="navbar navbar-gitlab navbar-expand-sm js-navbar" data-qa-selector="navbar">
<a class="sr-only gl-accessibility" href="#content-body" tabindex="1">Skip to content</a>
<div class="container-fluid">
<div class="header-content">
<div class="title-container">
<h1 class="title">
<a title="Dashboard" id="logo" href="/"><svg width="24" height="24" class="tanuki-logo" viewBox="0 0 36 36">
  <path class="tanuki-shape tanuki-left-ear" fill="#e24329" d="M2 14l9.38 9v-9l-4-12.28c-.205-.632-1.176-.632-1.38 0z"/>
  <path class="tanuki-shape tanuki-right-ear" fill="#e24329" d="M34 14l-9.38 9v-9l4-12.28c.205-.632 1.176-.632 1.38 0z"/>
  <path class="tanuki-shape tanuki-nose" fill="#e24329" d="M18,34.38 3,14 33,14 Z"/>
  <path class="tanuki-shape tanuki-left-eye" fill="#fc6d26" d="M18,34.38 11.38,14 2,14 6,25Z"/>
  <path class="tanuki-shape tanuki-right-eye" fill="#fc6d26" d="M18,34.38 24.62,14 34,14 30,25Z"/>
  <path class="tanuki-shape tanuki-left-cheek" fill="#fca326" d="M2 14L.1 20.16c-.18.565 0 1.2.5 1.56l17.42 12.66z"/>
  <path class="tanuki-shape tanuki-right-cheek" fill="#fca326" d="M34 14l1.9 6.16c.18.565 0 1.2-.5 1.56L18 34.38z"/>
</svg>

<span class="logo-text d-none d-lg-block prepend-left-8">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 617 169"><path d="M315.26 2.97h-21.8l.1 162.5h88.3v-20.1h-66.5l-.1-142.4M465.89 136.95c-5.5 5.7-14.6 11.4-27 11.4-16.6 0-23.3-8.2-23.3-18.9 0-16.1 11.2-23.8 35-23.8 4.5 0 11.7.5 15.4 1.2v30.1h-.1m-22.6-98.5c-17.6 0-33.8 6.2-46.4 16.7l7.7 13.4c8.9-5.2 19.8-10.4 35.5-10.4 17.9 0 25.8 9.2 25.8 24.6v7.9c-3.5-.7-10.7-1.2-15.1-1.2-38.2 0-57.6 13.4-57.6 41.4 0 25.1 15.4 37.7 38.7 37.7 15.7 0 30.8-7.2 36-18.9l4 15.9h15.4v-83.2c-.1-26.3-11.5-43.9-44-43.9M557.63 149.1c-8.2 0-15.4-1-20.8-3.5V70.5c7.4-6.2 16.6-10.7 28.3-10.7 21.1 0 29.2 14.9 29.2 39 0 34.2-13.1 50.3-36.7 50.3m9.2-110.6c-19.5 0-30 13.3-30 13.3v-21l-.1-27.8h-21.3l.1 158.5c10.7 4.5 25.3 6.9 41.2 6.9 40.7 0 60.3-26 60.3-70.9-.1-35.5-18.2-59-50.2-59M77.9 20.6c19.3 0 31.8 6.4 39.9 12.9l9.4-16.3C114.5 6 97.3 0 78.9 0 32.5 0 0 28.3 0 85.4c0 59.8 35.1 83.1 75.2 83.1 20.1 0 37.2-4.7 48.4-9.4l-.5-63.9V75.1H63.6v20.1h38l.5 48.5c-5 2.5-13.6 4.5-25.3 4.5-32.2 0-53.8-20.3-53.8-63-.1-43.5 22.2-64.6 54.9-64.6M231.43 2.95h-21.3l.1 27.3v94.3c0 26.3 11.4 43.9 43.9 43.9 4.5 0 8.9-.4 13.1-1.2v-19.1c-3.1.5-6.4.7-9.9.7-17.9 0-25.8-9.2-25.8-24.6v-65h35.7v-17.8h-35.7l-.1-38.5M155.96 165.47h21.3v-124h-21.3v124M155.96 24.37h21.3V3.07h-21.3v21.3"/></svg>

</span>
</a></h1>
<ul class="list-unstyled navbar-sub-nav">
<li class="home"><a title="Projects" class="dashboard-shortcuts-projects" href="/explore">Projects
</a></li><li class=""><a title="Groups" class="dashboard-shortcuts-groups" href="/explore/groups">Groups
</a></li><li class=""><a title="Snippets" class="dashboard-shortcuts-snippets" href="/explore/snippets">Snippets
</a></li><li>
<a title="About GitLab CE" href="/help">Help</a>
</li>
</ul>

</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="nav-item d-none d-lg-block m-auto">
<div class="search search-form" data-track-event="activate_form_input" data-track-label="navbar_search" data-track-value="">
<form class="form-inline" action="/search" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" /><div class="search-input-container">
<div class="search-input-wrap">
<div class="dropdown" data-url="/search/autocomplete">
<input type="search" name="search" id="search" placeholder="Search or jump to…" class="search-input dropdown-menu-toggle no-outline js-search-dashboard-options" spellcheck="false" tabindex="1" autocomplete="off" data-issues-path="/dashboard/issues" data-mr-path="/dashboard/merge_requests" data-qa-selector="search_term_field" aria-label="Search or jump to…" />
<button class="hidden js-dropdown-search-toggle" data-toggle="dropdown" type="button"></button>
<div class="dropdown-menu dropdown-select js-dashboard-search-options">
<div class="dropdown-content"><ul>
<li class="dropdown-menu-empty-item">
<a>
Loading...
</a>
</li>
</ul>
</div><div class="dropdown-loading"><i aria-hidden="true" data-hidden="true" class="fa fa-spinner fa-spin"></i></div>
</div>
<svg class="s16 search-icon"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#search"></use></svg>
<svg class="s16 clear-icon js-clear-input"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#close"></use></svg>
</div>
</div>
</div>
<input type="hidden" name="group_id" id="group_id" class="js-search-group-options" />
<input type="hidden" name="project_id" id="search_project_id" value="2712276" class="js-search-project-options" data-project-path="dropzone" data-name="Dropzone" data-issues-path="/meno/dropzone/issues" data-mr-path="/meno/dropzone/-/merge_requests" data-issues-disabled="false" />
<input type="hidden" name="search_code" id="search_code" value="true" />
<input type="hidden" name="repository_ref" id="repository_ref" value="master" />
<input type="hidden" name="nav_source" id="nav_source" value="navbar" />
<div class="search-autocomplete-opts hide" data-autocomplete-path="/search/autocomplete" data-autocomplete-project-id="2712276" data-autocomplete-project-ref="master"></div>
</form></div>

</li>
<li class="nav-item d-inline-block d-lg-none">
<a title="Search" aria-label="Search" data-toggle="tooltip" data-placement="bottom" data-container="body" href="/search?project_id=2712276"><svg class="s16"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#search"></use></svg>
</a></li>
<li class="nav-item header-help dropdown d-none d-md-block">
<a class="header-help-dropdown-toggle" data-toggle="dropdown" href="/help"><svg class="s16"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#question"></use></svg>
<svg class="caret-down"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#angle-down"></use></svg>
</a><div class="dropdown-menu dropdown-menu-right">
<ul>
<li>
<a href="/help">Help</a>
</li>
<li>
<a href="https://about.gitlab.com/getting-help/">Support</a>
</li>

<li class="divider"></li>
<li>
<a href="https://about.gitlab.com/submit-feedback">Submit feedback</a>
</li>
<li>
<a target="_blank" class="text-nowrap" href="https://about.gitlab.com/contributing">Contribute to GitLab
</a>

</li>

<li>
<a href="https://next.gitlab.com/">Switch to GitLab Next</a>
</li>
</ul>

</div>
</li>
<li class="nav-item">
<div>
<a class="btn btn-sign-in" href="/users/sign_in?redirect_to_referer=yes">Sign in / Register</a>
</div>
</li>
</ul>
</div>
<button class="navbar-toggler d-block d-sm-none" type="button">
<span class="sr-only">Toggle navigation</span>
<svg class="s12 more-icon js-navbar-toggle-right"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#ellipsis_h"></use></svg>
<svg class="s12 close-icon js-navbar-toggle-left"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#close"></use></svg>
</button>
</div>
</div>
</header>

<div class="layout-page page-with-contextual-sidebar">
<div class="nav-sidebar">
<div class="nav-sidebar-inner-scroll">
<div class="context-header">
<a title="Dropzone" href="/meno/dropzone"><div class="avatar-container rect-avatar s40 project-avatar">
<img alt="Dropzone" class="avatar s40 avatar-tile lazy" width="40" height="40" data-src="https://assets.gitlab-static.net/uploads/-/system/project/avatar/2712276/dropzone-logo.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
</div>
<div class="sidebar-context-title">
Dropzone
</div>
</a></div>
<ul class="sidebar-top-level-items">
<li class="home"><a class="shortcuts-project rspec-project-link" data-qa-selector="project_link" href="/meno/dropzone"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#home"></use></svg>
</div>
<span class="nav-item-name">
Project overview
</span>
</a><ul class="sidebar-sub-level-items">
<li class="fly-out-top-item"><a href="/meno/dropzone"><strong class="fly-out-top-item-name">
Project overview
</strong>
</a></li><li class="divider fly-out-top-item"></li>
<li class=""><a title="Project details" class="shortcuts-project" href="/meno/dropzone"><span>Details</span>
</a></li><li class=""><a title="Activity" class="shortcuts-project-activity" data-qa-selector="activity_link" href="/meno/dropzone/activity"><span>Activity</span>
</a></li><li class=""><a title="Releases" class="shortcuts-project-releases" href="/meno/dropzone/-/releases"><span>Releases</span>
</a></li><li class=""><a title="Cycle Analytics" class="shortcuts-project-cycle-analytics" href="/meno/dropzone/-/cycle_analytics"><span>Cycle Analytics</span>
</a></li><li class=""><a title="Insights" class="shortcuts-project-insights" data-qa-selector="project_insights_link" href="/meno/dropzone/insights/"><span>Insights</span>
</a></li>
</ul>
</li><li class="active"><a class="shortcuts-tree qa-project-menu-repo" href="/meno/dropzone/tree/master"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#doc-text"></use></svg>
</div>
<span class="nav-item-name" id="js-onboarding-repo-link">
Repository
</span>
</a><ul class="sidebar-sub-level-items">
<li class="fly-out-top-item active"><a href="/meno/dropzone/tree/master"><strong class="fly-out-top-item-name">
Repository
</strong>
</a></li><li class="divider fly-out-top-item"></li>
<li class="active"><a href="/meno/dropzone/tree/master">Files
</a></li><li class=""><a id="js-onboarding-commits-link" href="/meno/dropzone/commits/master">Commits
</a></li><li class=""><a class="qa-branches-link" id="js-onboarding-branches-link" href="/meno/dropzone/-/branches">Branches
</a></li><li class=""><a href="/meno/dropzone/-/tags">Tags
</a></li><li class=""><a href="/meno/dropzone/-/graphs/master">Contributors
</a></li><li class=""><a href="/meno/dropzone/-/network/master">Graph
</a></li><li class=""><a href="/meno/dropzone/compare?from=master&amp;to=master">Compare
</a></li><li class=""><a href="/meno/dropzone/-/graphs/master/charts">Charts
</a></li><li class=""><a data-qa-selector="path_locks_link" href="/meno/dropzone/path_locks">Locked Files
</a></li>
</ul>
</li><li class=""><a class="shortcuts-issues qa-issues-item" href="/meno/dropzone/issues"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#issues"></use></svg>
</div>
<span class="nav-item-name" id="js-onboarding-issues-link">
Issues
</span>
<span class="badge badge-pill count issue_counter">
144
</span>
</a><ul class="sidebar-sub-level-items">
<li class="fly-out-top-item"><a href="/meno/dropzone/issues"><strong class="fly-out-top-item-name">
Issues
</strong>
<span class="badge badge-pill count issue_counter fly-out-badge">
144
</span>
</a></li><li class="divider fly-out-top-item"></li>
<li class=""><a title="Issues" href="/meno/dropzone/issues"><span>
List
</span>
</a></li><li class=""><a title="Boards" data-qa-selector="issue_boards_link" href="/meno/dropzone/-/boards"><span>
Boards
</span>
</a></li><li class=""><a title="Labels" class="qa-labels-link" href="/meno/dropzone/-/labels"><span>
Labels
</span>
</a></li><li class=""><a title="Service Desk" href="/meno/dropzone/issues/service_desk">Service Desk
</a></li>
<li class=""><a title="Milestones" class="qa-milestones-link" href="/meno/dropzone/-/milestones"><span>
Milestones
</span>
</a></li></ul>
</li><li class=""><a class="shortcuts-merge_requests" data-qa-selector="merge_requests_link" href="/meno/dropzone/-/merge_requests"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#git-merge"></use></svg>
</div>
<span class="nav-item-name" id="js-onboarding-mr-link">
Merge Requests
</span>
<span class="badge badge-pill count merge_counter js-merge-counter">
26
</span>
</a><ul class="sidebar-sub-level-items is-fly-out-only">
<li class="fly-out-top-item"><a href="/meno/dropzone/-/merge_requests"><strong class="fly-out-top-item-name">
Merge Requests
</strong>
<span class="badge badge-pill count merge_counter js-merge-counter fly-out-badge">
26
</span>
</a></li></ul>
</li><li class=""><a class="shortcuts-pipelines qa-link-pipelines rspec-link-pipelines" data-qa-selector="ci_cd_link" href="/meno/dropzone/pipelines"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#rocket"></use></svg>
</div>
<span class="nav-item-name" id="js-onboarding-pipelines-link">
CI / CD
</span>
</a><ul class="sidebar-sub-level-items">
<li class="fly-out-top-item"><a href="/meno/dropzone/pipelines"><strong class="fly-out-top-item-name">
CI / CD
</strong>
</a></li><li class="divider fly-out-top-item"></li>
<li class=""><a title="Pipelines" class="shortcuts-pipelines" href="/meno/dropzone/pipelines"><span>
Pipelines
</span>
</a></li><li class=""><a title="Jobs" class="shortcuts-builds" href="/meno/dropzone/-/jobs"><span>
Jobs
</span>
</a></li><li class=""><a title="Schedules" class="shortcuts-builds" href="/meno/dropzone/pipeline_schedules"><span>
Schedules
</span>
</a></li><li class=""><a title="Charts" class="shortcuts-pipelines-charts" href="/meno/dropzone/pipelines/charts"><span>
Charts
</span>
</a></li></ul>
</li><li class=""><a data-qa-selector="dependency_list_link" href="/meno/dropzone/dependencies"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#shield"></use></svg>
</div>
<span class="nav-item-name">
Security &amp; Compliance
</span>
</a><ul class="sidebar-sub-level-items">
<li class="fly-out-top-item"><a href="/meno/dropzone/dependencies"><strong class="fly-out-top-item-name">
Security &amp; Compliance
</strong>
</a></li><li class="divider fly-out-top-item"></li>
<li class=""><a title="Dependency List" data-qa-selector="dependency_list_link" href="/meno/dropzone/dependencies"><span>Dependency List</span>
</a></li><li class=""><a title="License Compliance" data-qa-selector="licenses_list_link" href="/meno/dropzone/-/licenses"><span>License Compliance</span>
</a></li></ul>
</li>
<li class=""><a data-qa-selector="packages_link" href="/meno/dropzone/container_registry"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#package"></use></svg>
</div>
<span class="nav-item-name">
Packages
</span>
</a><ul class="sidebar-sub-level-items">
<li class="fly-out-top-item"><a href="/meno/dropzone/container_registry"><strong class="fly-out-top-item-name">
Packages
</strong>
</a></li><li class="divider fly-out-top-item"></li>
<li class=""><a class="shortcuts-container-registry" title="Container Registry" href="/meno/dropzone/container_registry"><span>Container Registry</span>
</a></li></ul>
</li>
<li class=""><a data-qa-selector="project_analytics_link" href="/meno/dropzone/-/analytics/code_reviews"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#chart"></use></svg>
</div>
<span class="nav-item-name">
Analytics
</span>
</a><ul class="sidebar-sub-level-items">
<li class=""><a title="Code Review" href="/meno/dropzone/-/analytics/code_reviews"><span>Code Review</span>
</a></li></ul>
</li>
<li class=""><a class="shortcuts-wiki" data-qa-selector="wiki_link" href="/meno/dropzone/-/wikis/home"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#book"></use></svg>
</div>
<span class="nav-item-name">
Wiki
</span>
</a><ul class="sidebar-sub-level-items is-fly-out-only">
<li class="fly-out-top-item"><a href="/meno/dropzone/-/wikis/home"><strong class="fly-out-top-item-name">
Wiki
</strong>
</a></li></ul>
</li><li class=""><a title="Members" class="shortcuts-tree" href="/meno/dropzone/-/settings/members"><div class="nav-icon-container">
<svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#users"></use></svg>
</div>
<span class="nav-item-name">
Members
</span>
</a><ul class="sidebar-sub-level-items is-fly-out-only">
<li class="fly-out-top-item"><a href="/meno/dropzone/-/project_members"><strong class="fly-out-top-item-name">
Members
</strong>
</a></li></ul>
</li><a class="toggle-sidebar-button js-toggle-sidebar qa-toggle-sidebar rspec-toggle-sidebar" role="button" title="Toggle sidebar" type="button">
<svg class="icon-angle-double-left"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#angle-double-left"></use></svg>
<svg class="icon-angle-double-right"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#angle-double-right"></use></svg>
<span class="collapse-text">Collapse sidebar</span>
</a>
<button name="button" type="button" class="close-nav-button"><svg class="s16"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#close"></use></svg>
<span class="collapse-text">Close sidebar</span>
</button>
<li class="hidden">
<a title="Activity" class="shortcuts-project-activity" href="/meno/dropzone/activity"><span>
Activity
</span>
</a></li>
<li class="hidden">
<a title="Network" class="shortcuts-network" href="/meno/dropzone/-/network/master">Graph
</a></li>
<li class="hidden">
<a title="Charts" class="shortcuts-repository-charts" href="/meno/dropzone/-/graphs/master/charts">Charts
</a></li>
<li class="hidden">
<a class="shortcuts-new-issue" href="/meno/dropzone/issues/new">Create a new issue
</a></li>
<li class="hidden">
<a title="Jobs" class="shortcuts-builds" href="/meno/dropzone/-/jobs">Jobs
</a></li>
<li class="hidden">
<a title="Commits" class="shortcuts-commits" href="/meno/dropzone/commits/master">Commits
</a></li>
<li class="hidden">
<a title="Issue Boards" class="shortcuts-issue-boards" href="/meno/dropzone/-/boards">Issue Boards</a>
</li>
</ul>
</div>
</div>

<div class="content-wrapper">

<div class="mobile-overlay"></div>
<div class="alert-wrapper">






<nav class="breadcrumbs container-fluid container-limited" role="navigation">
<div class="breadcrumbs-container">
<button name="button" type="button" class="toggle-mobile-nav"><span class="sr-only">Open sidebar</span>
<i aria-hidden="true" data-hidden="true" class="fa fa-bars"></i>
</button><div class="breadcrumbs-links js-title-container">
<ul class="list-unstyled breadcrumbs-list js-breadcrumbs-list">
<li><a href="/meno">Matias Meno</a><svg class="s8 breadcrumbs-list-angle"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#angle-right"></use></svg></li> <li><a href="/meno/dropzone"><img alt="Dropzone" class="avatar-tile lazy" width="15" height="15" data-src="https://assets.gitlab-static.net/uploads/-/system/project/avatar/2712276/dropzone-logo.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><span class="breadcrumb-item-text js-breadcrumb-item-text">Dropzone</span></a><svg class="s8 breadcrumbs-list-angle"><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#angle-right"></use></svg></li>

<li>
<h2 class="breadcrumbs-sub-title"><a href="/meno/dropzone/blob/master/src/dropzone.js">Repository</a></h2>
</li>
</ul>
</div>

</div>
</nav>

<div class="d-flex"></div>
</div>
<div class="container-fluid container-limited ">
<div class="content" id="content-body">
<div class="flash-container flash-container-page sticky">
</div>

<div class="js-signature-container" data-signatures-path="/meno/dropzone/commits/a2ca9930debd03a10b9b2ad5e81382a7a251804e/signatures?limit=1"></div>

<div class="tree-holder" id="tree-holder">
<div class="nav-block">
<div class="tree-ref-container">
<div class="tree-ref-holder">
<form class="project-refs-form" action="/meno/dropzone/refs/switch" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="destination" id="destination" value="blob" />
<input type="hidden" name="path" id="path" value="src/dropzone.js" />
<div class="dropdown">
<button class="dropdown-menu-toggle js-project-refs-dropdown qa-branches-select" type="button" data-toggle="dropdown" data-selected="master" data-ref="master" data-refs-url="/meno/dropzone/refs?sort=updated_desc" data-field-name="ref" data-submit-form-on-click="true" data-visit="true"><span class="dropdown-toggle-text ">master</span><i aria-hidden="true" data-hidden="true" class="fa fa-chevron-down"></i></button>
<div class="dropdown-menu dropdown-menu-paging dropdown-menu-selectable git-revision-dropdown qa-branches-dropdown">
<div class="dropdown-page-one">
<div class="dropdown-title"><span>Switch branch/tag</span><button class="dropdown-title-button dropdown-menu-close" aria-label="Close" type="button"><i aria-hidden="true" data-hidden="true" class="fa fa-times dropdown-menu-close-icon"></i></button></div>
<div class="dropdown-input"><input type="search" id="" class="dropdown-input-field qa-dropdown-input-field" placeholder="Search branches and tags" autocomplete="off" /><i aria-hidden="true" data-hidden="true" class="fa fa-search dropdown-input-search"></i><i aria-hidden="true" data-hidden="true" role="button" class="fa fa-times dropdown-input-clear js-dropdown-input-clear"></i></div>
<div class="dropdown-content"></div>
<div class="dropdown-loading"><i aria-hidden="true" data-hidden="true" class="fa fa-spinner fa-spin"></i></div>
</div>
</div>
</div>
</form>
</div>
<ul class="breadcrumb repo-breadcrumb">
<li class="breadcrumb-item">
<a href="/meno/dropzone/tree/master">dropzone
</a></li>
<li class="breadcrumb-item">
<a href="/meno/dropzone/tree/master/src">src</a>
</li>
<li class="breadcrumb-item">
<a href="/meno/dropzone/blob/master/src/dropzone.js"><strong>dropzone.js</strong>
</a></li>
</ul>
</div>
<div class="tree-controls"><a class="btn shortcuts-find-file" rel="nofollow" href="/meno/dropzone/find_file/master"><i aria-hidden="true" data-hidden="true" class="fa fa-search"></i>
<span>Find file</span>
</a><a class="btn js-blob-blame-link" href="/meno/dropzone/blame/master/src/dropzone.js">Blame</a><a class="btn" href="/meno/dropzone/commits/master/src/dropzone.js">History</a><a class="btn js-data-file-blob-permalink-url" href="/meno/dropzone/blob/87407778f4021002d2e2b2b787e38285229cdfa1/src/dropzone.js">Permalink</a></div>
</div>

<div class="info-well d-none d-sm-block">
<div class="well-segment">
<ul class="blob-commit-info">
<li class="commit flex-row js-toggle-container" id="commit-a2ca9930">
<div class="avatar-cell d-none d-sm-block">
<a href="mailto:mollick2@gmail.com"><img alt="Mike Mollick&#39;s avatar" src="https://secure.gravatar.com/avatar/3c54b49d177fa52fa64df3416ef3da96?s=80&amp;d=identicon" class="avatar s40 d-none d-sm-inline-block" title="Mike Mollick" /></a>
</div>
<div class="commit-detail flex-list">
<div class="commit-content qa-commit-content">
<a class="commit-row-message item-title js-onboarding-commit-item " href="/meno/dropzone/commit/a2ca9930debd03a10b9b2ad5e81382a7a251804e">Timeout now emmits an error</a>
<span class="commit-row-message d-inline d-sm-none">
&middot;
a2ca9930
</span>
<div class="committer">
<a class="commit-author-link" href="mailto:mollick2@gmail.com">Mike Mollick</a> authored <time class="js-timeago" title="Aug 3, 2018 2:15am" datetime="2018-08-03T02:15:03Z" data-toggle="tooltip" data-placement="bottom" data-container="body">Aug 02, 2018</time>
</div>

</div>
<div class="commit-actions flex-row">

<div class="js-commit-pipeline-status" data-endpoint="/meno/dropzone/commit/a2ca9930debd03a10b9b2ad5e81382a7a251804e/pipelines?ref=master"></div>
<div class="commit-sha-group d-none d-sm-flex">
<div class="label label-monospace monospace">
a2ca9930
</div>
<button class="btn btn btn-default" data-toggle="tooltip" data-placement="bottom" data-container="body" data-title="Copy commit SHA" data-class="btn btn-default" data-clipboard-text="a2ca9930debd03a10b9b2ad5e81382a7a251804e" type="button" title="Copy commit SHA" aria-label="Copy commit SHA"><svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#duplicate"></use></svg></button>

</div>
</div>
</div>
</li>

</ul>
</div>


</div>
<div class="blob-content-holder" id="blob-content-holder">
<article class="file-holder">
<div class="js-file-title file-title-flex-parent">
<div class="file-header-content">
<i aria-hidden="true" data-hidden="true" class="fa fa-file-text-o fa-fw"></i>
<strong class="file-title-name qa-file-title-name">
dropzone.js
</strong>
<button class="btn btn-clipboard btn-transparent" data-toggle="tooltip" data-placement="bottom" data-container="body" data-class="btn-clipboard btn-transparent" data-title="Copy file path" data-clipboard-text="{&quot;text&quot;:&quot;src/dropzone.js&quot;,&quot;gfm&quot;:&quot;`src/dropzone.js`&quot;}" type="button" title="Copy file path" aria-label="Copy file path"><svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#duplicate"></use></svg></button>
<small class="mr-1">
91.1 KB
</small>
</div>

<div class="file-actions"><a class="btn btn-primary js-edit-blob ml-2  btn-sm" href="/meno/dropzone/edit/master/src/dropzone.js">Edit</a><a class="btn btn-inverted btn-primary ide-edit-button ml-2 btn-sm" href="/-/ide/project/meno/dropzone/edit/master/-/src/dropzone.js">Web IDE</a><div class="btn-group ml-2" role="group">


</div><div class="btn-group ml-2" role="group">
<button class="btn btn btn-sm js-copy-blob-source-btn" data-toggle="tooltip" data-placement="bottom" data-container="body" data-class="btn btn-sm js-copy-blob-source-btn" data-title="Copy file contents" data-clipboard-target=".blob-content[data-blob-id=&#39;85f65f45cfe0927e6d056353f656d7ad50d4580a&#39;]" type="button" title="Copy file contents" aria-label="Copy file contents"><svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#duplicate"></use></svg></button>
<a class="btn btn-sm has-tooltip" target="_blank" rel="noopener noreferrer" aria-label="Open raw" title="Open raw" data-container="body" href="/meno/dropzone/raw/master/src/dropzone.js"><svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#doc-code"></use></svg></a>
<a download="src/dropzone.js" class="btn btn-sm has-tooltip" target="_blank" rel="noopener noreferrer" aria-label="Download" title="Download" data-container="body" href="/meno/dropzone/raw/master/src/dropzone.js?inline=false"><svg><use xlink:href="https://gitlab.com/assets/icons-70856f9b7d0749bfd282e4167164e232a0303c1226867feda2a716abac8183f9.svg#download"></use></svg></a>

</div></div>
</div>

<script id="js-file-lock" type="application/json">
{"path":"src/dropzone.js","toggle_path":"/meno/dropzone/path_locks/toggle"}
</script>


<div class="blob-viewer" data-type="simple" data-url="/meno/dropzone/blob/master/src/dropzone.js?format=json&amp;viewer=simple">
<div class="text-center prepend-top-default append-bottom-default">
<i aria-hidden="true" aria-label="Loading content…" class="fa fa-spinner fa-spin fa-2x qa-spinner"></i>
</div>

</div>


</article>
</div>

<div class="modal" id="modal-upload-blob">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h3 class="page-title">Replace dropzone.js</h3>
<button aria-label="Close" class="close" data-dismiss="modal" type="button">
<span aria-hidden>&times;</span>
</button>
</div>
<div class="modal-body">
<form class="js-quick-submit js-upload-blob-form" data-method="put" action="/meno/dropzone/update/master/src/dropzone.js" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="put" /><input type="hidden" name="authenticity_token" value="j/O77t5XLLetJHrzbRhuxAdZNzXil3rBkZgCyIreWIU9LPih802ex3UuNPiR0uMhxlaAEpOzl2A3U8/CsrSpMg==" /><div class="dropzone">
<div class="dropzone-previews blob-upload-dropzone-previews">
<p class="dz-message light">
Attach a file by drag &amp; drop or <a class="markdown-selector" href="#">click to upload</a>
</p>
</div>
</div>
<br>
<div class="dropzone-alerts alert alert-danger data" style="display:none"></div>
<div class="form-group row commit_message-group">
<label class="col-form-label col-sm-2" for="commit_message-0ea367ff64a6f3568910984e039420c5">Commit message
</label><div class="col-sm-10">
<div class="commit-message-container">
<div class="max-width-marker"></div>
<textarea name="commit_message" id="commit_message-0ea367ff64a6f3568910984e039420c5" class="form-control js-commit-message" placeholder="Replace dropzone.js" required="required" rows="3">
Replace dropzone.js</textarea>
</div>
</div>
</div>

<input type="hidden" name="branch_name" id="branch_name" />
<input type="hidden" name="create_merge_request" id="create_merge_request" value="1" />
<input type="hidden" name="original_branch" id="original_branch" value="master" class="js-original-branch" />

<div class="form-actions">
<button name="button" type="button" class="btn btn-success btn-upload-file" id="submit-all"><i aria-hidden="true" data-hidden="true" class="fa fa-spin fa-spinner js-loading-icon hidden"></i>
Replace file
</button><a class="btn btn-cancel" data-dismiss="modal" href="#">Cancel</a>
<div class="inline prepend-left-10">
A new branch will be created in your fork and a new merge request will be started.
</div>

</div>
</form></div>
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>




</body>
</html>

