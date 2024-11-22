package com.example.mindtec;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class RecursosAdapter extends RecyclerView.Adapter<RecursosAdapter.ViewHolder> {
    private List<Recursos> recursos;
    private Context context;

    public RecursosAdapter(List<Recursos> recursos, Context context) {
        this.recursos = recursos;
        this.context = context;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_recursos, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        Recursos recurso = recursos.get(position);

        holder.tituloRecurso.setText(recurso.getTitulo());
        WebSettings webSettings = holder.videoWebView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        holder.videoWebView.setWebViewClient(new WebViewClient());

        String videoUrl = recurso.getUrl();
        String embedUrl = "https://www.youtube.com/embed/" + videoUrl.split("v=")[1];
        holder.videoWebView.loadUrl(embedUrl);
    }

    @Override
    public int getItemCount() {
        return recursos.size();
    }

    public static class ViewHolder extends RecyclerView.ViewHolder {
        public TextView tituloRecurso;
        public WebView videoWebView;

        public ViewHolder(View itemView) {
            super(itemView);
            tituloRecurso = itemView.findViewById(R.id.titulo_recurso);
            videoWebView = itemView.findViewById(R.id.video_web_view);
        }
    }
}
