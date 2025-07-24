<?php
namespace App\Http\Controllers\API;
use App\Consts\CallStatuses;
use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Counter;
use App\Models\Queue;
use App\Models\Service;
use App\Repositories\ReportRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    protected $reportRepository;
    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }
    public function dashboard()
    {
        $today_queue = Queue::where('created_at', '>=', Carbon::now()->startOfDay())->where('created_at', '<=', Carbon::now())
            ->where('called', false)->count();
        $today_served = Call::where('created_at', '>=', Carbon::now()->startOfDay())->where('created_at', '<=', Carbon::now())
            ->where('call_status_id', CallStatuses::SERVED)->count();
        $today_noshow = Call::where('created_at', '>=', Carbon::now()->startOfDay())->where('created_at', '<=', Carbon::now())
            ->where('call_status_id', CallStatuses::NOSHOW)->count();
        $today_serving = Call::where('created_at', '>=', Carbon::now()->startOfDay())->where('created_at', '<=', Carbon::now())
            ->whereNull('call_status_id')->count();

        $chart_data = $this->reportRepository->getTodayYesterdayData();
        return response()->json($chart_data);
        
    }

    public function servicesAndCounters() 
    {
        $services = Service::where('status', 1)->get();
        $counters = Counter::where('status', 1)->get();
        return response()->json(['services' => $services, 'counters' => $counters]);
    }
}