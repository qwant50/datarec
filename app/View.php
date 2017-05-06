<?

namespace Qwant;

class View
{
    public function render($template, array $data = [])
    {
        //var_dump($data['content']);
        $data['content'] = file_get_contents($data['content']);
        ob_start();
        require_once $template;
        echo ob_get_clean();
    }
}