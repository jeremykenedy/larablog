<ul class="list-inline text-center">
  <li>
    <a href="{{ url('rss') }}" data-toggle="tooltip" title="RSS feed">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li>    
    <a href="{{ env('PERSONAL_WEBSITE_URL') }}" data-toggle="tooltip" title="{{ env('PERSONAL_WEBSITE_URL') }}">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-hand-spock-o fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li>
    <a href="https://twitter.com/{{ env('TWITTER_USERNAME') }}" target="_blank" data-toggle="tooltip" title="My Twitter Page">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li>
    <a href="https://www.facebook.com/{{ env('FACEBOOK_USERNAME') }}" target="_blank" data-toggle="tooltip" title="My Facebook Page">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li>
    <a href="https://www.google.com/+{{ env('GOOGLE_PLUS_USERNAME') }}" target="_blank" data-toggle="tooltip" title="My Google+ Page">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li>
    <a href="https://www.linkedin.com/pub/{{ env('LINKED_IN_USERNAME') }}/" target="_blank" data-toggle="tooltip" title="My LinkedIn Page">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li> 
    <a href="https://github.com/{{ env('GITHUB_USERNAME') }}" target="_blank" data-toggle="tooltip" title="My GitHub Page">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>
  <li> 
    <a href="https://bitbucket.org/{{ env('BITBUCKET_USERNAME') }}" target="_blank" data-toggle="tooltip" title="My Bitbucket Page">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-bitbucket fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>

</ul>